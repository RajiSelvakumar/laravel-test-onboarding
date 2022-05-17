var fname = document.getElementById('form_fname').value;
var lname = document.getElementById('form_lname').value;
var email = document.getElementById('form_email').value;
var contact = document.getElementById('form_contact').value;
var date = document.getElementById('form_date').value;


const jsonData = {
   Firstname: fname,
   Lastname: lname,
   Email: email,
   Contact: contact,
   Date: date
};
function onDownload() {
   function download(content, fileName, contentType) {
      const a = document.createElement("a");
      const file = new Blob([content], {
         type: contentType
      });
      a.href = URL.createObjectURL(file);
      a.download = fileName;
      a.click();
   }
   download(JSON.stringify(jsonData, undefined, 5), "json.json", "text/plain");
}