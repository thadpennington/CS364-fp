// JavaScript code for autocomplete suggestions
const searchBox = document.getElementById('search');
const suggestions = document.createElement('div');
suggestions.setAttribute('class', 'suggestions');
searchBox.parentNode.appendChild(suggestions);

const instructors = ['Adrian de Freitas', 'Benjamin McGraw', 'James Maher', 'Joel Coffman', 'Shannon Beck', 'Steven Hadfield'];

searchBox.addEventListener('input', function() {
  const inputText = this.value.toLowerCase();
  suggestions.innerHTML = '';
  const matches = instructors.filter(instructors => instructors.toLowerCase().startsWith(inputText));
  matches.forEach(match => {
    const suggestion = document.createElement('div');
    suggestion.setAttribute('class', 'suggestion');
    suggestion.innerHTML = match;
    suggestion.addEventListener('click', function() {
      searchBox.value = this.innerHTML;
      suggestions.innerHTML = '';
    });
    suggestions.appendChild(suggestion);
  });
});

document.addEventListener('click', function(event) {
  if (!event.target.closest('.searchbox')) {
    suggestions.innerHTML = '';
  }
});
