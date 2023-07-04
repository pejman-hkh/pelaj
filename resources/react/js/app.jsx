import './bootstrap';
import '../css/app.css';

import { createRoot } from 'react-dom/client';
document.body.innerHTML = '<div id="app"></div>';

const root = createRoot(document.getElementById('app'));
function capitalize(s)
{
    return s[0].toUpperCase() + s.slice(1);
}

axios.get('?api=1').then( async function (response) {
    
    let data = response.data;

    let page = capitalize (window.location.pathname.replace('/laravel/blog/public/', '').split('/')[0] );
    const modules = await import(`./Pages/${page}.jsx`);
    
    const App = modules.default;

    root.render(<App {...{data}} />);

 
})
.catch(function (error) {
    console.log(error);
})
.finally(function () {
});