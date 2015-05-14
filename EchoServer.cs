/*
   A C# class that represents a server that continually echos any TCP
   message back to the client until it receives DONE
   Note Run from a non-mapped drive to avoid security requirements
*/
using System;
using System.IO;
using System.Net;
using System.Net.Sockets;
using System.Text;
using System.Threading;

public class EchoServer
{
   private bool stopRequested;
   public const int PORT = 8888; // host port number
   public const string DONE = "done"; // terminates echo
   
   public EchoServer()
   {  stopRequested = false;
   }
   
   // start the server if not already started and repeatedly listen
   // for client connections until stop requested
   public void StartServer()
   {  stopRequested = false;
      TcpListener listener = null;
      try
      {  listener = new TcpListener(IPAddress.Any, PORT);
         listener.Start();
         Console.WriteLine("Server started at {0} on port {1}",
            Dns.GetHostName(), PORT);
      }
      catch (Exception e)
      {  Console.WriteLine("Client could not make connection: " + e);
         System.Environment.Exit(System.Environment.ExitCode);
      }
      while (!stopRequested)
      {  // block until the next client requests a connection
         try
         {  Socket socket = listener.AcceptSocket();
            Console.WriteLine("Connection made with "
               + socket.RemoteEndPoint);
            // start an echo with this connection
            EchoConnection echo = new EchoConnection(socket);
            Thread thread = new Thread(new ThreadStart(echo.Run));
            thread.Start();
         }
         catch (Exception e)
         {  Console.WriteLine("Can't accept client connection: " + e);
            stopRequested = true;
         }
      }
      Console.WriteLine("Server finishing");
   }
   
   // stops server AFTER the next client connection has been made
   // or timeout is reached
   public void RequestStop()
   {  stopRequested = true;
   }
   
   // driver main method to test the class
   // note that it doesn't call requestStop so main does not exit
   public static void Main(string[] args)
   {  EchoServer server = new EchoServer();
      server.StartServer();
   }
   
   // inner class that represents a single echo connection
   private class EchoConnection
   {
      private Socket socket; // socket for client/server communication
      
      public EchoConnection(Socket socket)
      {  this.socket = socket;
      }
      
      public void Run() // can call this method anything
      {  NetworkStream stream = new NetworkStream(socket);
         BinaryWriter bw = null; // output stream to client
         BinaryReader br = null; // input stream from client
         try
         {  bw = new BinaryWriter(stream);
            br = new BinaryReader(stream);
            // echo client messages until DONE is received
            string clientRequest;
            do
            {  // start communication by waiting for client request
               clientRequest = ReadString(br); // blocking
               // then prepare a suitable server response
               String serverResponse = clientRequest;
               WriteString(bw, clientRequest);
            }
            while (!DONE.Equals(clientRequest.Trim().ToLower()));
            Console.WriteLine("Closing connection with "
               + socket.RemoteEndPoint);
         }
         catch (SocketException e)
         {  Console.WriteLine("Server error: " + e);
         }
         finally
         {  try
            {  if (bw != null) bw.Close();
               if (br != null) br.Close();
               if (stream != null) stream.Close();
               if (socket != null) socket.Close();
            }
            catch (SocketException e)
            {  Console.WriteLine("Failed to close streams: " + e);
            }
         }
      }
      
      // utility method to write a string to the BinaryWriter character
      // by character followed by a line separator "\r\n"
      // Note that the BinaryWriter method Write(string) actually
      // writes a length-prefixed string to the stream
      private void WriteString(BinaryWriter bw, string text)
      {  char[] chars = (text+"\r\n").ToCharArray();
         bw.Write(chars);
      }
      
      // utility method to read a string from the BinaryReader that is
      // presumed to be terminated with (windows) line separator "\r\n"
      // Note that the BinrayReader method ReadString actually expects
      // to receive a length-prefixed string from the stream
      private string ReadString(BinaryReader br)
      {  StringBuilder stringBuilder = new StringBuilder();
         char nextChar = br.ReadChar();
         while (nextChar != '\r')
         {  stringBuilder.Append(nextChar);
            nextChar = br.ReadChar();
         }
         if (br.ReadChar() != '\n')
            throw new ApplicationException("Unexpected line separator");
         return stringBuilder.ToString();
      }
   }
}
