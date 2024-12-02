
//This data will be moved to the database shortly
const events = [
{
    title: "Entrepreneurship Workshop: Idea Validation",
    date: "2024-03-15",
    time: "6:00 PM",
    eventType: "workshop",
    description: "Learn how to validate your business ideas.",
    detailedDescription: "This workshop will cover various methods for validating your business idea, including market research, customer interviews, and competitor analysis.  Guest speaker:  Sarah Chen, Founder of InnovateTech."
},
{
    title: "Networking Mixer",
    date: "2017-03-22",
    time: "7:00 PM",
    eventType: "networking",
    description: "Connect with fellow entrepreneurs and investors.",
    detailedDescription: "Join us for an evening of networking and socializing.  Meet potential collaborators, mentors, and investors.  Light refreshments will be served."
},
{
    title: "Pitch Competition",
    date: "2024-03-29",
    time: "2:00 PM",
    eventType: "competition",
    description: "Showcase your business idea and compete for prizes!",
    detailedDescription: "This is your chance to pitch your business idea to a panel of judges and compete for valuable prizes.  Prepare a concise and compelling presentation."
},
{
    title: "Guest Speaker:  Funding Your Startup",
    date: "2024-04-05",
    time: "6:30 PM",
    eventType: "speaker",
    description: "Learn about different funding options for startups.",
    detailedDescription: "Our guest speaker, David Lee, a successful angel investor, will share insights into securing funding for your startup, including bootstrapping, angel investors, venture capital, and crowdfunding."
},
{
  title: "Guest Speaker:  Funding Your Startup 1",
  date: "2024-03-05",
  time: "6:30 PM",
  eventType: "speaker",
  description: "Learn about different funding options for startups.",
  detailedDescription: "Our guest speaker, David Lee, a successful angel investor, will share insights into securing funding for your startup, including bootstrapping, angel investors, venture capital, and crowdfunding."
},
{
    title: "Financial Planning for Entrepreneurs",
    date: "2029-04-12",
    time: "10:00 AM",
    eventType: "financial",
    description: "Master the essentials of financial planning for your business.",
    detailedDescription: "This workshop will cover budgeting, forecasting, cash flow management, and other key financial aspects of running a successful business."
},

{
  title: "Trial for creation of a new list item",
  date: "2023-07-12",
  time: "10:00 AM",
  eventType: "speaker",
  description: "This is to try and see whether a new list item will be created automatically.",
  detailedDescription: "This workshop will cover budgeting, forecasting, cash flow management, and other key financial aspects of running a successful business."
}

];

let currentDate = new Date();
const calendarGrid = document.getElementById('calendar-grid');
const currentMonthDisplay = document.getElementById('currentMonth');
const prevMonthButton = document.getElementById('prevMonth');
const nextMonthButton = document.getElementById('nextMonth');

function getYearsWithEvents() {
  const years = new Set();
  events.forEach(event => {
      years.add(new Date(event.date).getFullYear());
  });
  console.log(years);
  return Array.from(years).sort((a, b) => a - b); // Sort years ascending
}


function getMonthsWithEvents(year) {
  const months = new Set();
  events.forEach(event => {
      const eventDate = new Date(event.date);
      if (eventDate.getFullYear() === year) {
          months.add(eventDate.getMonth());
      }
  });
  return Array.from(months).sort((a, b) => a - b); // Sort months ascending
}

function populateYearDropdown() {
  const years = getYearsWithEvents();
  const yearSelect = document.getElementById('yearSelect');
  yearSelect.innerHTML = '<option value="" disabled selected>Click to select a year</option>'; // Clear existing options

  years.forEach(year => {
      const option = document.createElement('option');
      option.value = year;
      option.text = year;
      yearSelect.appendChild(option);
  });
}


function updateYearDisplay() {
  const yearDisplay = document.getElementById('currentYearDisplay');
  if (yearDisplay) { // Check if the element exists before accessing it
      yearDisplay.textContent = currentDate.getFullYear();
  }
}
function getIcon(event) {
  switch (event.eventType.toLowerCase()) {
      case "workshop":
          return "scheduleIcons/clubMeeting.png"; 
      case "networking":
          return "scheduleIcons/peopleShakingHands.png"; 
      case "competition":
          return "scheduleIcons/trophy.png"; 
      case "speaker":
          return "scheduleIcons/microphone.png"; 
      case "financial":
          return "scheduleIcons/graph.png"; 
      default:
          return "scheduleIcons/default.png"; 
  }
}



function filterEventsByMonth(events, year, month) {
  return events.filter(event => {
      const eventDate = new Date(event.date);
      return eventDate.getFullYear() === year && eventDate.getMonth() === month;
  });
}

function displayEvents(monthEvents) {
  const eventList = document.getElementById('eventList');
  eventList.innerHTML = ''; 

  if (monthEvents.length === 0) {
      const noEventsMessage = document.createElement('div');
      noEventsMessage.classList.add('no-events');
      noEventsMessage.innerHTML = `
          <img src="no-events-animation.gif" alt="No Events Animation">
          <h2 style="color: #DAA520; font-size: 2em; margin-top: 20px;">No events for this month</h2>
      `;
      eventList.appendChild(noEventsMessage);
  } else {
      monthEvents.forEach(event => {
          const iconSrc = getIcon(event); 
          const eventHTML = `
          <div class="event">
              <div class="icon-title">
                  <img class="icon" src="${iconSrc}" alt="Event Icon">
                  <h3>${event.title}</h3>
              </div>
              <div class="event-details"> 
                  <p>${event.date} at ${event.time}</p>
                  <p>${event.description}</p>
                  <p>${event.detailedDescription}</p>
              </div>
          </div>
      `;
          eventList.insertAdjacentHTML('beforeend', eventHTML);
      });
  }
}

function displayAllEvents() {
  const eventListAll = document.getElementById('event-list-all');
  eventListAll.innerHTML = ''; 

  const sortedEvents = [...events].sort((a, b) => new Date(a.date) - new Date(b.date));

  sortedEvents.forEach((event, index) => {
      const iconSrc = getIcon(event);
      const listItem = document.createElement('li');
      listItem.innerHTML = `
          <img class="icon" src="${iconSrc}" alt="Event Icon">
          <div class="event-info">
              ${index + 1}. ${event.title}<br>
              ${event.date} at ${event.time}
          </div>
      `;
      listItem.addEventListener('click', () => {
          currentDate = new Date(event.date);
          updateCalendar();
          displayEvents(filterEventsByMonth(events, currentDate.getFullYear(), currentDate.getMonth()));
      });
      eventListAll.appendChild(listItem);
  });
}


function updateCalendar() {
  const month = currentDate.getMonth();
  const year = currentDate.getFullYear();
  const firstDay = new Date(year, month, 1);
  const lastDay = new Date(year, month + 1, 0);
  const daysInMonth = lastDay.getDate();
  const dayIndex = firstDay.getDay();

  const monthNames = ["January", "February", "March", "April", "May", "June",
                      "July", "August", "September", "October", "November", "December"];

  currentMonthDisplay.textContent = `${monthNames[month]} ${year}`;
  calendarGrid.innerHTML = '';

  let day = 1;
  for (let i = 0; i < 42; i++) {
      const dayElement = document.createElement('div');
      dayElement.classList.add('calendar-day');

      if (i >= dayIndex && day <= daysInMonth) {
          dayElement.textContent = day;

          // Create Date objects for precise comparison at midnight
          const calendarDayDate = new Date(year, month, day, 0, 0, 0);
          const currentDateForComparison = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0);

          if (calendarDayDate.getTime() === currentDateForComparison.getTime()) {
              dayElement.classList.add('current');
          }
          day++;
      }
      calendarGrid.appendChild(dayElement);
  }

  const monthEvents = filterEventsByMonth(events, year, month);
  displayEvents(monthEvents);
  displayAllEvents();
  populateYearDropdown();
  updateYearDisplay();
  updateNavigation();
}

const yearSelect = document.getElementById('yearSelect');
yearSelect.addEventListener('change', () => {
    const selectedYear = parseInt(yearSelect.value, 10);
    if (!isNaN(selectedYear)) {
        currentDate.setFullYear(selectedYear);
        const months = getMonthsWithEvents(selectedYear);
        if (months.length > 0) {
            currentDate.setMonth(months[0]);
        }
        updateNavigation();
        updateCalendar();
    }
});


prevMonthButton.addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  updateCalendar();
});

nextMonthButton.addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  updateCalendar();
});

function updateNavigation() {
  const currentYear = currentDate.getFullYear();
  const yearDisplay = document.getElementById('year-display');
  yearDisplay.textContent = currentYear;

  const monthList = document.getElementById('month-list');
  monthList.innerHTML = ''; // Clear existing month buttons

  const monthNames = ["January", "February", "March", "April", "May", "June",
                     "July", "August", "September", "October", "November", "December"];

  const monthsWithEvents = getMonthsWithEvents(currentYear);

  if (monthsWithEvents.length === 0) {
      const noEventsMessage = document.createElement('div');
      noEventsMessage.classList.add('no-events-message'); // 
      noEventsMessage.textContent = "No events this year.";
      monthList.appendChild(noEventsMessage);
  } else {
      monthsWithEvents.forEach(monthIndex => {
          const monthSpan = document.createElement('span');
            monthSpan.classList.add('month-link'); // Add a class for styling
            monthSpan.textContent = monthNames[monthIndex];
            monthSpan.addEventListener('click', () => {
                currentDate.setMonth(monthIndex);
                updateCalendar();
            });
            monthList.appendChild(monthSpan);
      });
  }
}


function findClosestEventDate() {
  const sortedEvents = [...events].sort((a, b) => new Date(a.date) - new Date(b.date));
  const today = new Date();

  let closestFutureEvent = null;
  for (const event of sortedEvents) {
      // Explicitly set time to midnight to avoid time zone issues
      const eventDate = new Date(event.date);
      eventDate.setHours(0, 0, 0, 0); // Set time to midnight

      if (eventDate >= today) {
          closestFutureEvent = eventDate;
          break;
      }
  }

  if (closestFutureEvent === null && sortedEvents.length > 0) {
      const lastEventDate = new Date(sortedEvents[sortedEvents.length - 1].date);
      lastEventDate.setHours(0, 0, 0, 0); // Set time to midnight
      closestFutureEvent = lastEventDate;
  }

  return closestFutureEvent;
}
// Initial calendar setup:
const closestEventDate = findClosestEventDate();
if (closestEventDate) {
    currentDate = closestEventDate;
    updateCalendar();
} else {
    // Handle the case where there are no events at all
    console.log("No events found.");
}














