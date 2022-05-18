    let checkbox_vogel = document.getElementById("Vogel");
    let checkbox_kat = document.getElementById("Kat");
    let checkbox_hond = document.getElementById("Hond");
    let list_of_dieren = document.getElementsByTagName("li");
    let role = document.getElementById("role");
    role = role.innerHTML;
    let status = document.getElementsByClassName("status");
    //status = status.innerHTML;
    let eigenaar_knop = document.getElementById("Eigenaar");
    let oppasser_knop = document.getElementById("Oppasser");
    let oppasser_knop2 = document.getElementById("Oppasser2");
    //console.log(status);

    if(role == "Eigenaar"){
        oppasser_knop.style.display = "none";
        oppasser_knop2.style.display = "none";
    }else if(role == "Oppasser"){
        eigenaar_knop.style.display = "none";
    };




    checkbox_vogel.checked = true;
    checkbox_kat.checked = true;
    checkbox_hond.checked = true;

    for (let i = 0; i < list_of_dieren.length; i++){
        if(status == 0){
        list_of_dieren[i].style.display = "";
        }else if(status == 1){
            list_of_dieren[i].style.display = "none";
        }
    }

    checkbox_vogel.addEventListener('change', function(){
        console.log(123);
        if(checkbox_vogel.checked){
            console.log(list_of_dieren[0]);
            for( let i = 0; i < list_of_dieren.length; i++){
                if (list_of_dieren[i].dataset.kindOfAnimal == 'Vogel'){
                    list_of_dieren[i].style.display = '';
                }
            }
        }
        else{
            for( let i = 0; i < list_of_dieren.length; i++){
                if (list_of_dieren[i].dataset.kindOfAnimal == 'Vogel'){
                    list_of_dieren[i].style.display = 'none';
                }
        }
    }});

    checkbox_kat.addEventListener('change', function(){
        if(checkbox_kat.checked){
            for( let i = 0; i < list_of_dieren.length; i++){
                if (list_of_dieren[i].dataset.kindOfAnimal == 'Kat'){
                    list_of_dieren[i].style.display = '';
                }
            }
        }
        else{
            for( let i = 0; i < list_of_dieren.length; i++){
                if (list_of_dieren[i].dataset.kindOfAnimal == 'Kat'){
                    list_of_dieren[i].style.display = 'none';
                }
        }
    }});

    checkbox_hond.addEventListener('change', function(){
        if(checkbox_hond.checked){
            for( let i = 0; i < list_of_dieren.length; i++){
                if (list_of_dieren[i].dataset.kindOfAnimal == 'Hond'){
                    list_of_dieren[i].style.display = '';
                }
            }
        }
        else{
            for( let i = 0; i < list_of_dieren.length; i++){
                if (list_of_dieren[i].dataset.kindOfAnimal == 'Hond'){
                    list_of_dieren[i].style.display = 'none';
                }
        }
    }});