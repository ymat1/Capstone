flatpickr("#dateAndTime", {
    enableTime: true,
    minTime: '08:00',
    maxTime: '23:00',
    dateFormat: 'Y-m-d H:i',
    minDate: 'today',
    maxDate: new Date().fp_incr(14),
    altInput: true,
    altFormat: 'F j, Y - h:i K'
});