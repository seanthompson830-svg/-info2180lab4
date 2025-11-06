document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('#lookupForm');
  const showAllBtn = document.querySelector('#showAll');
  const resultDiv = document.querySelector('#result');
  const input = document.querySelector('#query');

  // When "Show All" button is clicked
  showAllBtn.addEventListener('click', async () => {
    const response = await fetch('superheroes.php');
    const data = await response.text();
    resultDiv.innerHTML = data;
  });

  // When form is submitted
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const query = input.value.trim();

    if (query === '') {
      resultDiv.innerHTML = '<p>Please enter a name.</p>';
      return;
    }

    const response = await fetch(`superheroes.php?query=${encodeURIComponent(query)}`);
    const data = await response.text();
    resultDiv.innerHTML = data;
  });
});
