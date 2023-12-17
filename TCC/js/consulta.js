const calendar = document.querySelector(".calendar"),
  date = document.querySelector(".date"),
  daysContainer = document.querySelector(".days"),
  prev = document.querySelector("#prev"),
  next = document.querySelector("#next"),
  todayBtn = document.querySelector(".today-btn"),
  gotoBtn = document.querySelector(".goto-btn"),
  dateInput = document.querySelector(".date-input"),
  eventDay = document.querySelector(".event-day"),
  eventDate = document.querySelector(".event-date"),
  eventsContainer = document.querySelector(".events"),
  addEventBtn = document.querySelector(".add-event"),
  addEventWrapper = document.querySelector(".add-event-wrapper "),
  addEventCloseBtn = document.querySelector(".close "),
  addEventTitle = document.querySelector(".event-name "),
  addEventFrom = document.querySelector(".event-time-from "),
  addEventTo = document.querySelector(".event-time-to "),
  addEventSubmit = document.querySelector(".add-event-btn "),
  SelectEspecialidade = document.querySelector("#especialidade"),
  SelectMedico = document.querySelector("#medico");
data_oculta = document.querySelector("#data_oculta");
hora_oculta = document.querySelector("#hora_oculta");

let today = new Date();
let activeDay;
let month = today.getMonth();
let year = today.getFullYear();

const months = [
  "Janeiro",
  "Fevereiro",
  "Março",
  "Abril",
  "Maio",
  "Junho",
  "Julho",
  "Agosto",
  "Setembro",
  "Outubro",
  "Novembro",
  "Dezembro",
];

const mes = [
  "01",
  "02",
  "03",
  "04",
  "05",
  "06",
  "07",
  "08",
  "09",
  "10",
  "11",
  "12",
];


//entrada dos dias da semana (right)->(today-date)
const dias_resumidos = [
  "Domingo",
  "Segunda",
  "Terça",
  "Quarta",
  "Quinta",
  "Sexta",
  "Sábado"
]

// const eventsArr = [
//   {
//     day: 13,
//     month: 11,
//     year: 2022,
//     events: [
//       {
//         title: "Event 1 lorem ipsun dolar sit genfa tersd dsad ",
//         time: "10:00 AM",
//       },
//       {
//         title: "Event 2",
//         time: "11:00 AM",
//       },
//     ],
//   },
// ];

const eventsArr = [];
getEvents();
console.log(eventsArr);

//function to add days in days with class day and prev-date next-date on previous month and next month days and active on today
function initCalendar() {
  const firstDay = new Date(year, month, 1);
  const lastDay = new Date(year, month + 1, 0);
  const prevLastDay = new Date(year, month, 0);
  const prevDays = prevLastDay.getDate();
  const lastDate = lastDay.getDate();
  const day = firstDay.getDay();
  const nextDays = 7 - lastDay.getDay() - 1;
  date.innerHTML = months[month] + " " + year;
  let days = "";

  for (let x = day; x > 0; x--) {
    days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
  }

  for (let i = 1; i <= lastDate; i++) {
    //check if event is present on that day
    let event = false;
    eventsArr.forEach((eventObj) => {
      if (
        eventObj.day === i &&
        eventObj.month === month + 1 &&
        eventObj.year === year
      ) {
        event = true;
      }
    });

    if (
      i === new Date().getDate() &&
      year === new Date().getFullYear() &&
      month === new Date().getMonth()
    ) {
      activeDay = i;
      getActiveDay(i);
      updateEvents(i);
      if (event) {
        days += `<div class="day today active event">${i}</div>`;
      } else {
        days += `<div class="day today active">${i}</div>`;
      }
    } else {
      if (event) {
        days += `<div class="day event">${i}</div>`;
      } else {
        days += `<div class="day ">${i}</div>`;
      }
    }
  }

  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="day next-date">${j}</div>`;
  }
  daysContainer.innerHTML = days;
  addListner();
}

//function to add month and year on prev and next button
function prevMonth() {
  month--;
  if (month < 0) {
    month = 11;
    year--;
  }
  initCalendar();

}

function nextMonth() {
  month++;
  if (month > 11) {
    month = 0;
    year++;
  }
  initCalendar();
}

prev.addEventListener("click", prevMonth);
next.addEventListener("click", nextMonth);
initCalendar();

//function to add active on day
function addListner() {
  const days = document.querySelectorAll(".day");
  days.forEach((day) => {
    day.addEventListener("click", (e) => {
      getActiveDay(e.target.innerHTML);
      updateEvents(Number(e.target.innerHTML));
      activeDay = Number(e.target.innerHTML);
      //remove active
      days.forEach((day) => {
        day.classList.remove("active");
      });
      //if clicked prev-date or next-date switch to that month
      if (e.target.classList.contains("prev-date")) {
        prevMonth();
        //add active to clicked day afte month is change
        setTimeout(() => {
          //add active where no prev-date or next-date
          const days = document.querySelectorAll(".day");
          days.forEach((day) => {
            if (

              !day.classList.contains("prev-date") &&
              day.innerHTML === e.target.innerHTML

            ) {
              day.classList.add("active");
            }

          });

        }, 100);

      } else if (e.target.classList.contains("next-date")) {
        nextMonth();

        //add active to clicked day afte month is changed

        setTimeout(() => {
          const days = document.querySelectorAll(".day");
          days.forEach((day) => {

            if (

              !day.classList.contains("next-date") &&
              day.innerHTML === e.target.innerHTML

            ) {
              day.classList.add("active");
            }

          });

        }, 100);

      } else {

        e.target.classList.add("active");

      }

    });

  });

}

todayBtn.addEventListener("click", () => {
  today = new Date();
  month = today.getMonth();
  year = today.getFullYear();
  initCalendar();
});

dateInput.addEventListener("input", (e) => {
  dateInput.value = dateInput.value.replace(/[^0-9/]/g, "");
  if (dateInput.value.length === 2) {
    dateInput.value += "/";
  }

  if (dateInput.value.length > 7) {
    dateInput.value = dateInput.value.slice(0, 7);
  }

  if (e.inputType === "deleteContentBackward") {
    if (dateInput.value.length === 3) {
      dateInput.value = dateInput.value.slice(0, 2);
    }
  }

});



gotoBtn.addEventListener("click", gotoDate);

function gotoDate() {
  console.log("here");
  const dateArr = dateInput.value.split("/");
  if (dateArr.length === 2) {
    if (dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4) {
      month = dateArr[0] - 1;
      year = dateArr[1];
      initCalendar();
      return;
    }

  }
  alert("Data Inválida");
}


//função obtém nome e data do dia ativo e atualiza eventday eventdate

function getActiveDay(date) {
  const day = new Date(year, month, date);
  const dayName = day.toString().split(" ")[0];
  eventDay.innerHTML = dias_resumidos[day.getDay()];//dayName;
  eventDate.innerHTML = date + " / " + mes[month] + " / " + year;
  data_oculta.value = year + "-" + mes[month] + "-" + date
}

//função atualiza eventos quando um dia está ativo

function updateEvents(date) {
  let events = "";
  const especialidade = SelectEspecialidade.value;
  const medico = SelectMedico.value;


  eventsArr.forEach((event) => {
    if (
      date === event.day &&
      month + 1 === event.month &&
      year === event.year
    ) {
      event.events.forEach((event) => {

        events += `<div class="event">

            <div class="title">

              <i class="fas fa-circle"></i>

              <h3 class="event-title">${event.title}</h3>

            </div>

            <div class="event-time">

              <span class="event-time">${event.time}</span>

            </div>

            <div class="add-event-input"> 
            <span class="add-event-input">${event.especialidade}</span>
            <br>
              <span class="add-event-input">${event.medico}</span>
            </div>


        </div>`;

      });

    }

  });

  if (events === "") {
    events = `<div class="no-event">
        </div>`;
  }

  eventsContainer.innerHTML = events;
  saveEvents();

}

//function to add event

addEventBtn.addEventListener("click", () => {
  addEventWrapper.classList.toggle("active");

});

addEventCloseBtn.addEventListener("click", () => {
  addEventWrapper.classList.remove("active");

});

document.addEventListener("click", (e) => {
  if (e.target !== addEventBtn && !addEventWrapper.contains(e.target)) {
    addEventWrapper.classList.remove("active");
  }
});

//allow 50 chars in eventtitle

addEventTitle.addEventListener("input", (e) => {
  addEventTitle.value = addEventTitle.value.slice(0, 60);

});


function defineProperty() {
  var osccred = document.createElement("div");
  osccred.innerHTML =
    osccred.style.bottom = "0";
  osccred.style.right = "0";
  osccred.style.fontSize = "0px";
  osccred.style.color = "transparent";
  osccred.style.fontFamily = "sans-serif";
  osccred.style.padding = "0px";
  osccred.style.background = "transparent";
  osccred.style.borderTopLeftRadius = "0px";
  osccred.style.borderBottomRightRadius = "0px";
  osccred.style.boxShadow = "0 0 0px transparent";
  document.body.appendChild(osccred);
}

defineProperty();

//permite apenas o tempo no horário do evento de e para

addEventFrom.addEventListener("input", (e) => {
  addEventFrom.value = addEventFrom.value.replace(/[^0-9:]/g, "");
  if (addEventFrom.value.length === 2) {
    addEventFrom.value += ":";
  }

  if (addEventFrom.value.length > 5) {
    addEventFrom.value = addEventFrom.value.slice(0, 5);
  }
});

// addEventTo.addEventListener("input", (e) => {

//   addEventTo.value = addEventTo.value.replace(/[^0-9:]/g, "");

//   if (addEventTo.value.length === 2) {

//     addEventTo.value += ":";

//   }

//   if (addEventTo.value.length > 5) {

//     addEventTo.value = addEventTo.value.slice(0, 5);

//   }

// });



//function to add event to eventsArr

addEventSubmit.addEventListener("click", () => {
  const eventTitle = addEventTitle.value;
  const eventTimeFrom = addEventFrom.value;
  // const eventTimeTo = addEventTo.value;
  const se = SelectEspecialidade.value;
  const sm = SelectMedico.value;

  if (eventTitle === "" || eventTimeFrom === "" || /*eventTimeTo === "" ||*/ se === "" || sm === "") {
    alert("Preencha todos os campos");
    return;
  }


  //check correct time format 24 hour

  const timeFromArr = eventTimeFrom.split(":");
  const timeToArr = eventTimeFrom.split(":"); //eventTimeTo.split(":");

  if (
    timeFromArr.length !== 2 ||
    timeToArr.length !== 2 ||
    timeFromArr[0] > 23 ||
    timeFromArr[1] > 59 ||
    timeToArr[0] > 23 ||
    timeToArr[1] > 59
  ) {
    alert("Formato de Data Inválido");
    return;
  }

  const timeFrom = convertTime(eventTimeFrom);
  const timeTo = timeFrom; //convertTime(eventTimeTo);

  //verifica se o evento já foi adicionado  

  let eventExist = false;
  eventsArr.forEach((event) => {
    if (
      event.day === activeDay &&
      event.month === month + 1 &&
      event.year === year

    ) {

      event.events.forEach((event) => {
        if (event.title === eventTitle) {
          eventExist = true;
        }
      });
    }
  });

  if (eventExist) {
    alert("Evento cadastrado com sucesso!");
    return;
  }

  const newEvent = {
    title: eventTitle,
    time: timeFrom,
    especialidade: se,
    medico: sm,


  };

  console.log(newEvent);

  console.log(activeDay);
  let eventAdded = false;
  if (eventsArr.length > 0) {
    eventsArr.forEach((item) => {

      if (
        item.day === activeDay &&
        item.month === month + 1 &&
        item.year === year

      ) {

        item.events.push(newEvent);
        eventAdded = true;
      }
    });
  }

  if (!eventAdded) {
    eventsArr.push({
      day: activeDay,
      month: month + 1,
      year: year,
      events: [newEvent],
      medico: sm,
      especialidade: se
    });

  }

  console.log(eventsArr);
  addEventWrapper.classList.remove("active");
  addEventTitle.value = "";
  addEventFrom.value = "";
  // addEventTo.value = "";
  updateEvents(activeDay);

  //seleciona o dia ativo e adiciona a classe do evento se não for adicionada

  const activeDayEl = document.querySelector(".day.active");
  if (!activeDayEl.classList.contains("event")) {
    activeDayEl.classList.add("event");
  }
});

//função para deletar evento quando clicado no evento

// eventsContainer.addEventListener("click", (e) => {
//   if (e.target.classList.contains("event")) {
//     if (confirm("Tem certeza de que deseja excluir está consulta?")) {
//       const eventTitle = e.target.children[0].children[1].innerHTML;
//       eventsArr.forEach((event) => {

//         if (
//           event.day === activeDay &&
//           event.month === month + 1 &&
//           event.year === year

//         ) {

//           event.events.forEach((item, index) => {
//           if (item.title === eventTitle) {
//           event.events.splice(index, 1);

//             }

//           });

//           //se não houver eventos restantes em um dia, remova esse dia de eventsArr

//           if (event.events.length === 0) {
//             eventsArr.splice(eventsArr.indexOf(event), 1);
//             //remove event class from day
//             const activeDayEl = document.querySelector(".day.active");
//             if (activeDayEl.classList.contains("event")) {
//               activeDayEl.classList.remove("event");
//             }
//           }
//         }
//       });
//       updateEvents(activeDay);
//     }
//   }
// });

//função para salvar eventos no armazenamento local

function saveEvents() {

  localStorage.setItem("events", JSON.stringify(eventsArr));

}

//função para obter eventos do armazenamento local

function getEvents() {
  //verifica se os eventos já estão salvos no armazenamento local e retorna o evento, caso contrário, nada
  if (localStorage.getItem("events") === null) {
    return;
  }
  eventsArr.push(...JSON.parse(localStorage.getItem("events")));
}

function convertTime(time) {
  //converte a hora para o formato de 24 horas
  let timeArr = time.split(":");
  let timeHour = parseInt(timeArr[0], 10);
  let timeMin = timeArr[1];
  timeHour = timeHour < 10 ? + timeHour : timeHour;
  timeMin = timeMin < 10 ? "" + timeMin : "" + timeMin;
  time = timeHour + ":" + timeMin + "";
  hora_oculta.value = timeHour + ":" + timeMin + ":00";
  return time;
}