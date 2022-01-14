const imgDiv = document.querySelector('Profil.css');
const img = document.querySelector('#photo');
const file = docoment.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');

// deja une image 

imgDiv.addEventListener('mouseenter', function()
{
    uploadBtn.style.display = "block"
});

// survole l'image 

imgDiv.addEventListener('mouseleave', function()
{
      uploadBtn.style.display = "none";
});

// montre l'image choisi

file.addEventListener('change', function(){
    // fait référence au fichier
    const choosedFile = this.file[0];
    if (choosedFile){
        const reader = new FileReader();

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });
        reader.readAsDataURL(choosedFile);
    }
});


