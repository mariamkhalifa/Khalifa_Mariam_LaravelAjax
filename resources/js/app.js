(()=>{
    require('./bootstrap');
    "use strict";
    console.log('linked');

    const burger = document.querySelector('#burger');
    const mainNav = document.querySelector('#mainNav');
    const searchField = document.querySelector('#search');


    // functions

    function toggleNav() {
        burger.classList.toggle('rotated');
        mainNav.classList.toggle('visible');
        gsap.from(mainNav, {autoAlpha: 0, duration: 1});
        gsap.to(mainNav, {autoAlpha: 1, duration: 1});
    }


    function showResults(e) {
        console.log('called');
        let str = e.currentTarget.value;

        let searchResults = document.querySelector('#searchResults');

        searchResults.innerHTML = '';

        if(str) {
            let url = `api/search-games?search=${str}`;

            fetch(url)
            .then(res=>res.json())
            .then(data=>{
                console.log(data);

                if(data.length>0) {
                    console.log(data);
                    
                    data.forEach(item=>{
                        let newImage = item.image.slice(7);
                        let imagePath = `storage/${newImage}`;
                        //console.log(imagePath);
                        searchResults.innerHTML +=
                        `<li>
                            <a href="/games/show/${item.id}">
                                <p>${item.name}</p>
                                <img src="${imagePath}" alt="game image">
                            </a>
                        </li>`
                    })
                } else {
                    searchResults.innerHTML = 'No results match your search.';
                }
            })
            .catch(err=>console.log(err));
        }
    }


    // events

    burger.addEventListener('click', toggleNav);

    if(searchField) {
        searchField.addEventListener('keyup', showResults);
    }
    

})();