//Вывод сообщения о подтверждении удаления автора!

const delAuthor = document.querySelector('#delauthor')

if (delAuthor)
{
 	delAuthor.addEventListener('click', (event) => {delMessage = confirm('Вы уверены, что хотите удалить этого автора? Данное действие может привести к необратимым последствиям!')
								 if (delMessage === false)
								 {
									 event.preventDefault();
								 }
							}, false)
}
