const settingsCategoryField = document.querySelector('#expenseLimitCategory')
const settingsLimitField = document.querySelector('#floatingLimitInput')

const getLimitForCategory = async id => {
	try {
		const res = await fetch(`../api/limit/${id}`)
		const data = await res.json()
		return data.limits
	} catch (e) {
		console.log('Error', e)
	}
}

settingsCategoryField.addEventListener('change', async () => {
	const limit = await getLimitForCategory(settingsCategoryField.value)
	settingsLimitField.value = limit ?? '0'
})
