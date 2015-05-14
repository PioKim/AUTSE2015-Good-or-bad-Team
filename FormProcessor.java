/**
   A servlet that demonstrates how a response can be prepared for an
   HTTP request that originated from a HTML form with text fields
   named firstname and lastname. Note that the servlet requires some
   Java Enterprise edition API and a compatible web server
   @author Andrew Ensor
*/
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class FormProcessor extends HttpServlet
{
   private final char QUOTE = '"';

   public void doGet(HttpServletRequest request,
      HttpServletResponse response)
      throws ServletException, IOException
   {  // obtain the values of the form data automatically URL decoded
      String firstName = request.getParameter("firstname");
      String lastName = request.getParameter("lastname");
      // set response headers before returning any message content
      response.setContentType("text/html");
      // prepare the content of the response
      PrintWriter pw = response.getWriter();
      pw.println("<!DOCTYPE HTML PUBLIC " + QUOTE +
         "-//W3C//DTD HTML 4.0 Transitional//EN" + QUOTE + ">\n" +
         "<HTML>\n" + "<HEAD>\n" +
         "<TITLE>FormProcessor</TITLE>\n" + "</HEAD>\n" + "<BODY>\n" +
         "<H1>FormProcessor Response</H1>\n" +
         "<P>Hello "+filter(firstName)+" "+filter(lastName)+"</P>\n"+
         "</BODY>\n</HTML>\n");
      pw.close();
   }
   
   public void doPost(HttpServletRequest request,
      HttpServletResponse response)
      throws ServletException, IOException
   {  doGet(request, response);
   }

   // filter string so that it doesn't contain special HTML characters
   public static String filter(String text)
   {  StringBuffer buffer = new StringBuffer();
      for (int i=0; i<text.length(); i++)
      {  char c = text.charAt(i);
         if (c == '<') buffer.append("&lt;");
         else if (c == '>') buffer.append("&gt;");
         else if (c == '"') buffer.append("quot;");
         else if (c == '&') buffer.append("amp;");
         else buffer.append(c);
      }
      return buffer.toString();
   }
}
