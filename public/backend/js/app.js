// let make the variable for the button
const button = document.querySelector('.course-btn');
button.addEventListener("mouseover",()=>{
    button.classList.add('animate__headShake');
});
button.addEventListener("mouseout",()=>{
    button.classList.remove('animate__headShake');
});
