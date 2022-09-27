const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', event => {
        event.preventDefault();
        const HasConfirmed = confirm('Sicuro di voler liminare il post?');
        if(HasConfirmed) form.submit();
    })
});