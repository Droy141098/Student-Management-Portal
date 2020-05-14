function go()
{  
    
    window.location.href = "../index.php";
}


    function validate()
   {     
    
         var reg;
        
            
            reg = /^[A-Za-z]+$/;
            a = (document.getElementById("firstName").value);
            if (a.match(reg)) {
    
                reg = /^[A-Za-z]+$/;
                a = (document.getElementById("lastName").value);
                if (a.match(reg)) {
    
                    reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    a = (document.getElementById("email").value);
                    if (a.match(reg)) {
    
                        reg=/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/;
                        a=(document.getElementById("phnNo").value);
                        if(a.match(reg)){
    
                            reg=/.+$/;
                            a=(document.getElementById("address").value);
                            if(a.match(reg))
                            {
                             if (sclass.value != "") 
                             {
                               if (document.getElementById('ssection').selectedIndex != "0")
                               {
                                reg=/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/;
                                a=(document.getElementById("pwd").value);
                                if(a.match(reg))
                                {
    
                                  b=(document.getElementById("confirmPwd").value);
                                  if(a==b)
                                  {
                                      return(true);
                                  }
                                  else
                                  {   
                                      alert("Password didnot match");
                                      return false;
                                  }
                                }
                                else
                                {
                                    alert("Please follow the password format");
                                    return false;
                                }
                            }

                            else
                            {
                                alert("Please select section");
                                return false;
                            }
                            }
                            else
                            {
                                alert("Please select class");
                                return false;
                            }
                            }
                            else
                            {
                                alert("Please fill in the address");
                                return false;
                            }
                        }
                        else
                        {
                            alert("invalid phone number");
                            return false;
    
                        }
                    }
                    else
                    {
                        alert("invalid email");
                        return false;
    
                    }
                }
                else
                {
                    alert("Please enter a valid last name");
                    return false;
    
                }
            }
        
            else
            {
                alert("Please enter a valid first name");
                return false;
    
            }
        }   


        function validateImage()
        {
            var flag=0;
          var fuData = document.getElementById('img');
        
          var FileUploadPath = fuData.value;
         
        //To check if user upload any file
          if (FileUploadPath == '') {
            alert("Please upload an image");
            return false;
        
        } else {
            var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
            var allowed=['jpg','jpeg','png','bmp','gif'];
            for(var i=0;i<allowed.length;i++)
            {
                if(allowed[i]==Extension)
                   {
                       flag=1;
                       break;
                   }
            }
            
        //The file uploaded is not an image
        
        if (flag==0)
                    {   
                      
                        alert("invalid image file");
                        return false;
                    }
        else
             {
                 return true;
             }
           }
        }
        
        
        function register()
        {   
            
            if(validate() && validateImage())
            {   
                
                
                    //alert("Successfully Registered"); 
                    //window.location.href="../index.php";
                   return true;
                
               
               
        
            }
            else 
              {
                 return false;
              }
        } 
        
        

