window.addEventListener('load', () => {
    let dbElements = document.querySelectorAll('.lissti, .lisstm');
    
    dbElements.forEach(function (dbElement) {
        let data;

        // Check the class and create the appropriate list element
        if (dbElement.classList.contains('lissti')) {
            data = document.createElement('ul');
        } else if (dbElement.classList.contains('lisstm')) {
            data = document.createElement('ol');
        }

        let list = dbElement.innerHTML;
        let dataArray = list.split(',');

        dataArray.forEach(function (item) {
            var newItem = document.createElement('li');
            newItem.textContent = item.trim();
            data.appendChild(newItem);
        });

        dbElement.parentNode.replaceChild(data, dbElement);
    });
    const menuIcon = document.querySelector('.menu-icon');
    const menuList = document.querySelector('.menu ul');
    const headr = document.querySelector('header')
    menuIcon.addEventListener('click', function () {
        if (getComputedStyle(headr).flexDirection === 'row') {
            headr.style.flexDirection= 'column';
        } else {
            headr.style.flexDirection = 'row';
        }
        menuList.classList.toggle('show');
        window.addEventListener('resize', function(){
            if(this.window.innerWidth>660)
            {
             headr.style.flexDirection = 'row';
             menuList.classList.remove('show');
            }
        })
    });
 
});

