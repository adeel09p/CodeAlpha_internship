window.addEventListener('load', () => {
    var priorityElements = document.querySelectorAll('.priority');

    priorityElements.forEach(function (element) {
        var priority = element.textContent.toLowerCase().trim();
        var priorityClass = 'priority-' + priority;

        // Define colors for each priority level
        var colorMap = {
            'low': '#dff0d8',     // Bootstrap success color
            'moderate': '#fcf8e3', // Bootstrap warning color
            'high': '#f2dede',    // Bootstrap danger color
            'closed': '#d9edf7'   // Bootstrap info color
            // Add additional priority levels if needed
        };

        // Set background color based on priority
        if (colorMap.hasOwnProperty(priority)) {
            element.style.backgroundColor = colorMap[priority];
        } else {
            // Default color if priority is not recognized
            element.style.backgroundColor = '#ffffff'; // Default to white
        }
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

