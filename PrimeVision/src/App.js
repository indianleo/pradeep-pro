import './css/App.css';
import Header from './features/header';
import 'bootstrap/dist/css/bootstrap.min.css';  
import Home from './features/home';
import Admin from './features/admin';
import React from 'react';

function App() {
  const [isAdmin, setAdmin] = React.useState(false);

  React.useEffect(()=> {
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('admin'); 
    if (myParam == '7800794002') {
      setAdmin(true);
    }
  }, [])

  return (
    <div className="App">
      <Header />
      {isAdmin ? <Admin /> : <Home />}
    </div>
  );
}

export default App;
