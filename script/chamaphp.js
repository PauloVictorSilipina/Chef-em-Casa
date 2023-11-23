function chamaheader() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "header.php");
  xhr.onload = function () {
    console.log(this.response);
  };
}