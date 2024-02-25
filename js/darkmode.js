const toggleSwitch = document.querySelector('#dark-mode-checkbox');

function switchTheme(e) {
  if (e.target.checked) {
    document.documentElement.setAttribute('data-theme', 'dark');
    document.documentElement.classList.add('dark');
    localStorage.setItem('theme', 'dark'); // save dark 
  } else {
    document.documentElement.removeAttribute('data-theme');
    document.documentElement.classList.remove('dark');
    localStorage.setItem('theme', 'light'); // save light
  }    
}

toggleSwitch.addEventListener('change', switchTheme, false);

// check save for preference
const currentTheme = localStorage.getItem('theme');
if (currentTheme) {
  document.documentElement.setAttribute('data-theme', currentTheme);
  if (currentTheme === 'dark') {
    toggleSwitch.checked = true;
    document.documentElement.classList.add('dark');
  }
}