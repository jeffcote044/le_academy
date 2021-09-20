document.getElementById("title").addEventListener('keyup', slugChange);

function slugChange() {
    let title = document.getElementById("title").value;
    document.getElementById("slug").value = slug(title)
}

function slug(str) {
    let slug = "";
    let trimmed = str.trim(str);
    let normalized = trimmed.normalize("NFD") // Normalizamos para obtener los códigos
        .replace(/[\u0300-\u036f|.,\/#!$%\^&\*;:{}=\-_`~()]/g, "") // Quitamos los acentos y símbolos de puntuación
        .replace(/ +/g, '-') // Reemplazamos los espacios por guiones
        .toLowerCase(); // Todo minúscula
    $slug = normalized.replace(/[^a-z0-9]/gi, "-").
    replace(/-+/g, "-").
    replace(/^-|-$/g, "-");
    return $slug.toLowerCase();
}

//CK Editor
ClassicEditor
    .create(document.querySelector('#description'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'blockQuote'],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            ]
        }
    })
    .catch(error => {
        console.log(error);
    });

//Cambiar Image SRC
document.getElementById("file").addEventListener('change', cambiarImagen);

function cambiarImagen(ev) {
    let file = ev.target.files[0];
    let reader = new FileReader();
    reader.onload = (ev) => {
        document.getElementById("picture").setAttribute('src', ev.target.result);
    }
    reader.readAsDataURL(file);
}