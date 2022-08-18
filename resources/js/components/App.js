import React from 'react';
import ReactDOM from 'react-dom';
import Login from "./Login";

function App() {
    return (
        <React.Fragment>
            <BrowserRouter>
                <Route path={'/app/login'}>
                    <Login/>
                </Route>
                <ProtectedRoute
                    exact path={'/app/dashboard'}
                    component={Dashboard}
                />
            </BrowserRouter>
        </React.Fragment>
    );
}
