document.addEventListener('readystatechange', function(){
    if(document.readyState !== 'complete'){
        return
    }
    console.log('document is ' + document.readyState)
})