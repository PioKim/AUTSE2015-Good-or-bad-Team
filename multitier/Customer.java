/**
   A class that represents a customer having firstName and lastName
   properties, as well as a startDate determined by when the customer
   is constructed. Implemented as a simple example of a bean
   On Tomcat place in folder webapps\ROOT\WEB-INF\classes\multitier
   @see CustomerServlet.java
*/
package multitier;

import java.io.Serializable;
import java.util.Date;

public class Customer implements Serializable
{
   private String firstName, lastName;
   private Date startDate;
   
   public Customer()
   {  firstName = null;
      lastName = null;
      startDate = new Date(); // current date and time
   }
   
   public String getFirstName()
   {  return firstName;
   }
   
   public void setFirstName(String firstName)
   {  this.firstName = firstName;
   }
   
   public String getLastName()
   {  return lastName;
   }
   
   public void setLastName(String lastName)
   {  this.lastName = lastName;
   }
   
   public Date getStartDate()
   {  return startDate;
   }
   
   public String getFullName()
   {  String fullName = "";
      if (firstName != null)
         fullName += firstName;
      if (firstName!=null && lastName!=null)
         fullName += " ";
      if (lastName != null)
         fullName += lastName;
      return fullName;
   }
} 
