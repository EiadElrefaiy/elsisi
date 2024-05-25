document.addEventListener('DOMContentLoaded', function() {
// Function to update the time
function updateTime() {
    const timeDropdown = document.getElementById('timeDropdown');
    const options = { timeZone: 'Africa/Cairo', hour12: true, hour: '2-digit', minute: '2-digit' };
    const currentTime = new Date().toLocaleTimeString('en-US', options);
    timeDropdown.textContent = currentTime;
}

// Initial call to update time
updateTime();

// Update time every second
setInterval(updateTime, 1000);
});

// Function to toggle the hide class on the aside element
function toggleSidebarVisibility() {
const asideElement = document.querySelector('.mobile');
asideElement.style.display = 'block';
}

// Function to toggle the hide class on the aside element
function toggleSidebarVisibilityMobile() {
const asideElement = document.querySelector('.mobile');
asideElement.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
const sidebartoggler = document.querySelector('.sidebartoggler');
const adminPicture = document.querySelector('.admin-picture');
let isSmall = false; // Track current state

sidebartoggler.addEventListener('click', function() {
    // Toggle size based on current state
    if (isSmall) {
    adminPicture.style.width = '100px';
    adminPicture.style.height = '100px';
    isSmall = false;
    } else {
    adminPicture.style.width = '50px';
    adminPicture.style.height = '50px';
    isSmall = true;
    }
});
});

document.addEventListener('DOMContentLoaded', function() {
const adminPicture = document.querySelector('.admin-picture');

// Function to apply styles for screens with width of 1169px or below
function applyStylesForSmallScreens() {
    const screenWidth = window.innerWidth;
    if (screenWidth <= 1169) {
    // Apply adjusted size for smaller screens to admin picture
    adminPicture.style.width = '50px';
    adminPicture.style.height = '50px';
    } else {
    // Reset styles if screen width is above 1169px
    adminPicture.style.width = ''; // Reset width
    adminPicture.style.height = ''; // Reset height
    }
}

// Initial call to apply styles based on screen width
applyStylesForSmallScreens();

// Listen for window resize events to dynamically apply styles
window.addEventListener('resize', applyStylesForSmallScreens);
});

// Function to generate the calendar
function generateCalendar(year, month) {
    const startDate = new Date(year, month, 1);
    const endDate = new Date(year, month + 1, 0);
    const startDay = (startDate.getDay() + 1) % 7; // Start from Saturday (0 = Sunday)
    const daysInMonth = endDate.getDate();

    const calendarBody = document.getElementById("calendarBody");
    const monthYear = document.getElementById("monthYear");
    monthYear.textContent = monthNamesArabic(month) + ' ' + year;

    // Clear previous month's days
    calendarBody.innerHTML = '';

    let date = 1;
    // Create rows
    for (let i = 0; i < 6; i++) {
    let row = document.createElement("tr");

    // Create cells
    for (let j = 0; j < 7; j++) {
        if (i === 0 && j < startDay) {
        // Empty cells before the start of the month
        let cell = document.createElement("td");
        row.appendChild(cell);
        } else if (date > daysInMonth) {
        // Stop when all days are filled
        break;
        } else {
        let cell = document.createElement("td");
        cell.textContent = date;
        if (year === new Date().getFullYear() && month === new Date().getMonth() && date === new Date().getDate()) {
            // Highlight today's date
            cell.classList.add("today");
        }
        row.appendChild(cell);
        date++;
        }
    }

    calendarBody.appendChild(row);
    }
}

// Function to get Arabic month name
function monthNamesArabic(month) {
    const monthsArabic = [
    'يناير',
    'فبراير',
    'مارس',
    'أبريل',
    'مايو',
    'يونيو',
    'يوليو',
    'أغسطس',
    'سبتمبر',
    'أكتوبر',
    'نوفمبر',
    'ديسمبر'
    ];
    return monthsArabic[month];
}

document.addEventListener('DOMContentLoaded', function() {
    const now = new Date();
    generateCalendar(now.getFullYear(), now.getMonth());
});

