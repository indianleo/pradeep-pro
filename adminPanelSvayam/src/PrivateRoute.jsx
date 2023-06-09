import React from 'react'
import { Route } from 'react-router-dom';


function PrivateRoute ({component: Component, authorize, ...rest}) {
    return (
        <Route
            {...rest}
            render={(props) => authorize === true
            ? <Component {...props} />
            : props.history.push("/")}
        />
    )
}

export default  PrivateRoute;