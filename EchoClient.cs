/*
   A C# class that represents a client that repeatedly sends any
   keyboard input to an EchoServer until the user enters DONE
   Note Run from a non-mapped drive to avoid security requirements
*/
using System;
using System.IO;
using System.Net;
using System.Net.Sockets;
using System.Text;

public class EchoClient
{
   public const string HOST_NAME="localhost"; //any C# const is static
   public const int HOST_PORT = 8888; // host port number
   public const string DONE = "done"; // terminates echo

   public EchoClient()
   {
   }
   
   public void StartClient()
   {  TcpClient client = null;
      try
      {  client = new TcpClient();
         client.Connect(HOST_NAME, HOST_PORT);
      }
      catch (SocketException e)
      {  Console.WriteLine("Client could not make connection: " + e);
         System.Environment.Exit(System.Environment.ExitCode);
      }
      NetworkStream stream = null;
      BinaryWriter bw = null; // output stream to server
      BinaryReader br = null; // input stream from server
      try
      {  stream = client.GetStream();
         bw = new BinaryWriter(stream);
         br = new BinaryReader(stream);
         // send text to server and display reply until DONE entered
         Console.WriteLine("Enter text or {0} to exit", DONE);
         string clientRequest;
         do
         {  // start communication by having client getting user
            // input and send it to server
            clientRequest = Console.ReadLine();
            WriteString(bw, clientRequest);
            // then get server response and display it
            string serverResponse = ReadString(br); // blocking
            Console.WriteLine("Response: " + serverResponse);
         }
         while (!DONE.Equals(clientRequest.Trim().ToLower()));
      }
      catch (SocketException e)
      {  Console.WriteLine("Client error: " + e);
      }
      finally
      {  try
         {  if (bw != null) bw.Close();
            if (br != null) br.Close();
            if (stream != null) stream.Close();
            if (client != null) client.Close();
         }
         catch (SocketException e)
         {  Console.WriteLine("Failed to close streams: " + e);
         }
      }
   }
   
   // utility method to write a string to the BinaryWriter character
   // by character followed by a line separator "\r\n"
   // Note that the BinaryWriter method Write(string) actually writes
   // a length-prefixed string to the stream
   private void WriteString(BinaryWriter bw, string text)
   {  char[] chars = (text+"\r\n").ToCharArray();
      bw.Write(chars);
   }
   
   // utility method to read a string from the BinaryReader that is
   // presumed to be terminated with (windows) line separator "\r\n"
   // Note that the BinaryReader method ReadString actually expects
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
   
   public static void Main(string[] args)
   {  EchoClient client = new EchoClient();
      client.StartClient();
   }
}
