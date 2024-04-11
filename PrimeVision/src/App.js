import './css/App.css';
import Header from './features/header';
import 'bootstrap/dist/css/bootstrap.min.css';  
import Home from './features/home';
import Admin from './features/admin';
import React from 'react';
import { AppProvider } from './context/AppContext';
import {
  BrowserRouter as Router,
  Routes,
  Route,
} from "react-router-dom";
import Login from './features/login';
import { ssd } from './libs/helper';

function App() {
  const user = ssd.get('user');

  return (
    <AppProvider>
      <div className="App">
        <Router>
          <Header />
          <div className="container">
            <Routes>
              {user.isLogin
                ? <Route path="/" element={<Home />} />
                : <>
                    <Route path="/" element={<Login />} />
                    <Route path="/home" element={<Home />} />
                </>
              }
                <Route path="/william" element={<Admin />} />
            </Routes>
          </div>
          {/* <Footer /> */}
        </Router>
      </div>
    </AppProvider>
  );
}

export default App;
