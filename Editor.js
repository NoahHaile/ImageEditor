import JPEG from "https://deno.land/x/jpeg/mod.ts";

const img = await Deno.readFile("./img.jpg");
const raw = JPEG.decode(img);

console.log(raw);

function loadImage(ev){
    while(document.getElementById('image').firstElementChild!=null){
        
        document. getElementById('image').removeChild(document.getElementById('image').firstElementChild);
    }
    clone=ev.cloneNode(true);
    clone.setAttribute("width", "auto");
    clone.setAttribute("height", "auto");
    document.getElementById('image').appendChild(clone);
}

function dropHandler(ev) {
    alert('ss');
    console.log('File(s) dropped');
    ev.preventDefault();
    
    if (ev.dataTransfer.items) {
      // Use DataTransferItemList interface to access the file(s)
      for (var i = 0; i < ev.dataTransfer.items.length; i++) {
        // If dropped items aren't files, reject them
        if (ev.dataTransfer.items[i].kind === 'file') {
          var file = ev.dataTransfer.items[i].getAsFile();
          console.log('... file[' + i + '].name = ' + file.name);
        }
      }
    } else {
      // Use DataTransfer interface to access the file(s)
      for (var i = 0; i < ev.dataTransfer.files.length; i++) {
        console.log('... file[' + i + '].name = ' + ev.dataTransfer.files[i].name);
        
      }
    }
}
function dragOverHandler(ev){

}