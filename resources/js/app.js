(()=>{
    require('./bootstrap');
    "use strict";
    console.log('linked');

    const searchField = document.querySelector('#search');
    //const searchResults = document.querySelector('#searchResults');


    function showResults(e) {
        console.log('called');
        let str = e.currentTarget.value;

        //searchResults.innerHTML = '';

        if(str) {
            let url = `api/search-games?search=${str}`;

            fetch(url)
            .then(res=>res.json())
            .then(data=>{
                console.log(data);
            })
            .catch(err=>console.log(err));
        }
    }

    searchField.addEventListener('keyup', showResults);

})();