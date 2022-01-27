(()=>{
    require('./bootstrap');
    "use strict";
    console.log('linked');

    const searchField = document.querySelector('#search');
    


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
                        let newImage = item.image.slice(7,53);
                        let imagePath = `storage/${newImage}`;
                        //console.log(imagePath);
                        searchResults.innerHTML +=
                        `<li>
                            <a href="#">
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

    searchField.addEventListener('keyup', showResults);

})();