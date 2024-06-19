const currentUrl = window.location.href
const navList = document.getElementById('navList').getElementsByTagName('a')

if (currentUrl.includes('/balance')) {
	document.getElementById('hiddenOption').classList.remove('hide')
}

for (let i = 0; i < navList.length; i++) {
	const link = navList[i]

	if (currentUrl.includes(link.getAttribute('href'))) {
		link.classList.add('active')
		break
	}
}

function togglePasswordVisibility() {
	const passwordField = document.getElementById('password')
	const toggleIcon = document.getElementById('togglePassword')

	if (passwordField.type === 'password') {
		passwordField.type = 'text'
	} else {
		passwordField.type = 'password'
	}
}
function toggleConfirmPasswordVisibility() {
	const confirmPasswordField = document.getElementById('confirmPassword')
	const confirmToggleIcon = document.getElementById('confirmTogglePassword')

	if (confirmPasswordField.type === 'password') {
		confirmPasswordField.type = 'text'
	} else {
		confirmPasswordField.type = 'password'
	}
}

function confirmDelete(incomeId) {
	if (confirm('Czy na pewno chcesz usunąć tę transakcję?')) {
		document.getElementById('deleteForm_' + incomeId).submit()
	}
}

function confirmDelete(expenseId) {
	if (confirm('Czy na pewno chcesz usunąć ten wydatek?')) {
		document.getElementById('deleteForm_' + expenseId).submit()
	}
}
