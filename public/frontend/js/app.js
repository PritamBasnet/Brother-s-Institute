
// let make the variable for the sticky section nav
const ObserveNav = document.querySelector('.section-top');
const SweeperSection = document.querySelector('.sweeper-me');

// let make the variable that hold the observe intersection
const observer = new IntersectionObserver((entries) => {
    const ent = entries[0];
    ent.isIntersecting == false ? ObserveNav.classList.add('section-sticky') : ObserveNav.classList.remove('section-sticky');
}, {
    root: null,
    rootMargin: "",
    threshold: 0,
});
observer.observe(SweeperSection);


// let us make an function for the search box
let SearchOpen = document.querySelector('.search_open');
let SearchClose = document.querySelector('.search_close');
let SearchBox = document.querySelector('.SearchBox');
let body = document.querySelector('body');
SearchOpen.addEventListener("click", () => {
    SearchOpen.style.display = "none";
    SearchClose.style.display = "block";
    SearchBox.style.transform = "scaleX(1)";
});
SearchClose.addEventListener("click", () => {
    SearchOpen.style.display = "block";
    SearchClose.style.display = "none";
    SearchBox.style.transform = "scaleX(0)";
});

// making an logic for the intersection observer
const workobserver = new IntersectionObserver((entries, observer) => {
    const [entry] = entries;
    if (!entry.isIntersecting) return;
    // animated number
    const counterNum = document.querySelectorAll('.counter-number');
    const speed = 200;
    counterNum.forEach((curElem) => {
        const updateNumber = () => {
            const targetNumber = parseInt(curElem.dataset.number);
            // console.log(targetNumber);
            const initialNum = parseInt(curElem.innerText);
            // console.log(initialNum);
            const incrementNum = Math.trunc(targetNumber / speed);
            if (initialNum < targetNumber) {
                curElem.innerText = initialNum + incrementNum;
                setTimeout(updateNumber, 10);
            }
        }
        updateNumber();
    });
    observer.unobserve(sectionWorkdata);

}, {
    root: null,
    threshold: 0,
});
const sectionWorkdata = document.querySelector('.sectionWorkdata');
workobserver.observe(sectionWorkdata);



