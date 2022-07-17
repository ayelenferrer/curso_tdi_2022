window.addEventListener('load', ()=>{
    let button = document.querySelector('.btnLogin')

    button.addEventListener('click', (e)=>{
        e.preventDefault();

        alert('Aparece Login')
    })
})