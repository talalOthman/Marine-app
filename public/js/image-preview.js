$(document).ready(function (e) {
 
   
    $('#image-upload').change(function(){
             
     let reader = new FileReader();
  
     reader.onload = (e) => { 
  
       $('#preview-image-before-upload').attr('src', e.target.result); 
     }
  
     reader.readAsDataURL(this.files[0]); 
    
    });
    
 });