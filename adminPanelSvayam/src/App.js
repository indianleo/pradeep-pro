import React from 'react';
import {HashRouter, BrowserRouter, Switch, Route } from 'react-router-dom';
import LoginScreen from './module/authontication/LoginScreen';
import Dashboard from './module/dashboard/Dashboard'
import PrivateRoute from './PrivateRoute'
import Error from './module/ErrorPage/ErrorPage'
import StudentDashboard from './module/student/StudentDashboard';


export default class App extends React.Component {
  constructor(props) {
    super(props)

    this.state = {
      sessionStart: false,
      authorize: true
    }

  } // end constructor

  render() {
    const {authorize} = this.state;
    return (
      <div>
        <BrowserRouter>
          <Switch>
            <Route exact path='/' component={LoginScreen} />
            <Route exact path='/login' component={LoginScreen} />
            <PrivateRoute authorize={authorize} path='/dashboard' component={Dashboard} />
            <PrivateRoute authorize={authorize} path='/studentPortal' component={StudentDashboard} />
            <PrivateRoute authorize={authorize} path='/driver' component={Dashboard} />
            <PrivateRoute authorize={authorize} path='/history' component={Dashboard} />
            <PrivateRoute authorize={authorize} path='/setting' component={Dashboard} />
            <Route component={Error} />

          </Switch>
        </BrowserRouter>
      </div>
    );
  }

}
