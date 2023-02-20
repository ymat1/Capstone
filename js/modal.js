const submit = document.querySelector('#submit-btn')
const reservation = document.querySelector('#reservation');
const fullName = document.querySelector('#fullName');
const phoneNumber = document.querySelector('#phone');
const email = document.querySelector('#email');
const numberOfGuests = document.querySelector('#numberOfGuests');
const dateAndTime = document.querySelector('#dateAndTime');

const nameError = document.querySelector('#nameError');
const phoneError = document.querySelector('#phoneError');
const emailError = document.querySelector('#emailError');
const guestError = document.querySelector('#guestError');
const dateError = document.querySelector('#dateError');
const timeError = document.querySelector('#timeError');

const validateFullName = () => {
    const nameValue = fullName.value.trim();
    const nameValidator = /^([A-Za-z]+){3,}\s([A-Za-z]+){3,}$/;

    nameError.innerText = '';
    if(!nameValue) {
        nameError.style.display = 'block';
        nameError.innerText = 'Full Name is required';
        return false;
    }
    else if(!nameValidator.test(nameValue)) {
        nameError.style.display = 'block';
        nameError.innerText = 'Name and Surname are required and can only contain letters';
        return false;
    }
    else {
        return true;
    }
};

const validatePhoneNumber = () => {
    const phoneValue = phoneNumber.value.trim();
    const phoneValidator = /^([0-9]{11,11})$/;

    phoneError.innerText = '';
    if(!phoneValue) {
        phoneError.style.display = 'block';
        phoneError.innerText = 'Phone Number is required';
        return false;
    }
    else if(!phoneValidator.test(phoneValue)) {
        phoneError.style.display = 'block';
        phoneError.innerText = 'Please enter a valid phone number';
        return false;
    }
    else {
        return true;
    }
};

const validateEmail = () => {
    const emailValue = email.value.trim();
    const emailValidator = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    emailError.innerText = '';
    if(!emailValue) {
        emailError.style.display = 'block';
        emailError.innerText = 'Email is required';
        return false;
    }
    else if(!emailValidator.test(emailValue)) {
        emailError.style.display = 'block';
        emailError.innerText = 'Please enter a valid email';
        return false;
    }
    else {
        return true;
    }
};

const validateNumberOfGuests = () => {
    const guestValue = numberOfGuests.value;

    guestError.innerText = '';
    if(guestValue === '0') {
        guestError.style.display = 'block';
        guestError.innerText = 'Number of guests is required';
        return false;
    }
    else {
        return true;
    }
};

const validateDateAndTime = () => {
    const dateTimeValue = dateAndTime.value;

    dateError.innerText = '';
    if(!dateTimeValue) {
        dateError.style.display = 'block';
        dateError.innerText = 'Date and Time are required';
        return false;
    }
    else {
        return true;
    }
};

reservation.addEventListener(
    'submit',
    (e) => {
        e.preventDefault();

        validateFullName();
        validatePhoneNumber();
        validateEmail();
        validateNumberOfGuests();
        validateDateAndTime();

        const serviceId = 'service_bmn85vn';
        const templateId = 'template_xevk21w';
        const publicKey = 'Qm3ATmfXKXgB8G6_m';

        const sendMail = {
            fullName: fullName.value,
            phoneNumber: phoneNumber.value,
            email: email.value,
            numberOfGuests: numberOfGuests.value,
            dateAndTime: dateAndTime.value
        };
        
        if( validateFullName() === true 
        && validatePhoneNumber() === true 
        && validateEmail() === true 
        && validateNumberOfGuests() === true 
        && validateDateAndTime() === true ) {
            $('#reserve').modal('hide');
            // emailjs.send(serviceId, templateId, sendMail, publicKey);
            console.log(sendMail);
            reservation.reset();
            setTimeout(
                () => {
                    $('#submitted').modal('show');
                },
                1000
            );
        }
    }
);