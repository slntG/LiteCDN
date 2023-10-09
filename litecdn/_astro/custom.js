document.addEventListener('DOMContentLoaded', function () {
	const postData = async (url = '', data = {}) => {
		const response  = await fetch(url, {
			method: 'post',
			body: data,
		})
		return response.json()
	}
	const submitBtn = document.querySelector('.form__button')
	submitBtn.onclick = async () => {
		const form = document.getElementById('contact-form')
		const fd = new FormData(form)
		if (fd.get('phone') === '') {
			if (fd.get('email') !== '' && fd.get('message') !== '') {
				const res = await postData('_astro/ajax.php', fd)
				if (res.status && res.status === 'success') {
					alert('Ваша заявка была отправлена')
				}
			} else {
				alert('заполните обязательные поля: электронная почта и сообщение!')
			}
		} else {
			alert('Вы точно человек?')
		}
	}
})