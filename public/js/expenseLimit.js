const limitValue = document.querySelector('#limitValue')
const limitInfo = document.querySelector('#limitInfo')
const limitLeft = document.querySelector('#limitLeft')
const category = document.querySelector('#category')
const dateField = document.querySelector('#date')
const amount = document.querySelector('#price')

const getLimitForCategory = async id => {
	try {
		const res = await fetch(`../api/limit/${id}`)
		const data = await res.json()
		return data.limits
	} catch (e) {
		console.log('Error', e)
	}
}

const getSumOfExpenses = async (categoryId, date) => {
	try {
		const res = await fetch(`../api/sumOfExpenses/${categoryId}/${date}`)
		const data = await res.json()
		return data.SumOfExpenses
	} catch (e) {
		console.log('Error', e)
	}
}

async function sumOfExpenses() {
	const sum = await getSumOfExpenses(category.value, dateField.value)
	limitValue.innerHTML = sum ? `W wybranym miesiącu wydano: ${sum} zł` : 'Nie było wydatków w wybranym miesiącu'
}

async function limitForCategory() {
	const limit = await getLimitForCategory(category.value)
	limitInfo.innerHTML = limit ? `Limit dla Kategorii wynosi: ${limit}` : 'Brak ustawionego limitu dla Kategorii'
}

async function calculate() {
	const limit = await getLimitForCategory(category.value)
	const sum = await getSumOfExpenses(category.value, dateField.value)

	if (!isNaN(parseFloat(amount.value))) {
		const result = limit - sum - parseFloat(amount.value)
		if (result < 0) {
			limitLeft.innerHTML = limit
				? `Pozostanie do wydania:  <span> ${result.toFixed(2)}</span>zł`
				: 'Brak ustawionego limitu dla Kategorii'
		} else {
			limitLeft.innerHTML = limit
				? `Pozostanie do wydania:  ${result.toFixed(2)}zł`
				: 'Brak ustawionego limitu dla Kategorii'
		}
	} else {
		limitLeft.innerHTML = 'Wprowadź kwotę'
	}
}

category.addEventListener('change', async () => {
	limitForCategory()
	sumOfExpenses()
	calculate()
})

dateField.addEventListener('change', sumOfExpenses)

amount.addEventListener('input', async () => {
	calculate()
	sumOfExpenses()
	limitForCategory()
})
