const placeholder = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png";
const imageField = document.getElementById('image-field');
const preview = document.getElementById('preview');

imageField.addEventListener('input', () => {
    if(imageField.value) preview.src = imageField.value;
    else preview.src = placeholder;
});