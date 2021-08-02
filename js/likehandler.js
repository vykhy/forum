/**
 * 
 * @param {*} id ID OF THE DIV WHERE LIKE COUNT IS TO BE UPDATED
 * @param {*} action like OR unlike: DEFINES WHETHER TO INCREMENT OR REDUCE LIKE COUNT
 */
function updatelikecount(id, action){

    let answer = document.getElementById(`likecount${id}`);
    let likes = parseInt(answer.textContent);

    switch(action){
        case('like'):{
            answer.textContent = likes + 1
            break;
        }
        case('unlike'):{
            answer.textContent = likes - 1;
            break;
        }
    }
}

/**
 * SENDS AJAX REQUEST TO INSERT LIKE AND UPDATE THE UI BY CALLING updatelikecount with like as action param
 */
function like(id, threadid, btnid){

    // FOR BUTTON UI UPDATE
    let button = document.getElementById(btnid);
    button.disabled = true
    
    // FOR AJAX REQUEST
    let xml = new XMLHttpRequest();
    let url = './includes/_likehandler.php'
    let data = `id=${id}&action=like&threadid=${threadid}`    

    xml.open('POST', url, true)

    xml.setRequestHeader('content-type', 'application/x-www-form-urlencoded')
    xml.onreadystatechange = () => {
        if(xml.readyState == 4 && xml.status == 200){
            updatelikecount(id, 'like');
            let parent = button.parentNode
            button.remove()
            let nbutton = document.createElement('button')
            nbutton.textContent = 'Unlike'
            nbutton.id = btnid
            nbutton.setAttribute('onclick', `unlike(${id},${threadid},this.id)`)
            nbutton.classList.add('text-danger')
            parent.appendChild(nbutton)
        }
    }
    xml.onerror = () => {
        button.disabled = false
    }
    xml.send(data)
}

/**
 * SENDS AJAX REQUEST TO DELETE LIKE AND UPDATE THE UI BY CALLING updatelikecount with unlike as action param
 */
function unlike(id,threadid,btnid){
    // FOR BUTTON UI UPDATE
    let button = document.getElementById(btnid)
    button.disabled = true
    
    // FOR AJAX REQUEST
    let xml = new XMLHttpRequest();
    let url = './includes/_likehandler.php'
    let data = `id=${id}&action=unlike`    

    xml.open('POST', url, true)

    xml.setRequestHeader('content-type', 'application/x-www-form-urlencoded')
    xml.onreadystatechange = () => {
        if(xml.readyState == 4 && xml.status == 200){
            updatelikecount(id, 'unlike');
    let parent = button.parentNode
    parent.removeChild(button)
            let nbutton = document.createElement('button')
            nbutton.textContent = 'Like'
            nbutton.id = btnid
            nbutton.setAttribute('onclick', `like(${id},${threadid},this.id)`)
            nbutton.classList.add('text-primary')
            parent.appendChild(nbutton)

        }
    }
    xml.onerror = () => {
        // let nbutton = document.createElement('button')
        // nbutton.textContent = 'Unlike'
        // nbutton.id = btnid
        // nbutton.setAttribute('onclick', `unlike(${id},${threadid},this.id)`)
        // parent.appendChild(nbutton)
        button.disabled = false
    }
    xml.send(data)
}