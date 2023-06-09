import React from 'react';
import { connect } from 'react-redux';

import Spinner from 'react-bootstrap/Spinner';
import './LoginScreen.css';
import Alert from '@material-ui/lab/Alert';
import {Button,Snackbar } from '@material-ui/core/';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEye, faEyeSlash } from '@fortawesome/free-solid-svg-icons';

import fire from './../../config/fire';
import store from '../../store';
import setUserdata from './../../reducers/Auth/action';



class LoginScreen extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            registrationID: '',
            password: '',
            loading: false,
            showPassword: false,
            formError: '',
        };
    } // end constructor

    componentDidMount() {
        console.log("Login Loaded...")
    }

    handleSubmit(e) {
        this.setState({loading: true})
        e.preventDefault();
        let u = this.state.registrationID;
        let p = this.state.password;
        let err = this.state.formError;
        if (!u) {
            this.setState({
                formError: "It seems REGISTRATION ID is not filled.",
                loading: false
            })
            this.registrationID.focus();
        } else if (!p) {
            this.setState({
                formError: "It seems PASSWORD is not filled.",
                loading: false
            })
            this.password.focus();
        } 
        if (u && p && err === '' ) {
            fire.database().ref(`users/`).get().then((response)=> {
                if (response.val()) {
                    if (u in response.val() && p === response.val()[u].pass){
                        this.props.history.push('/dashboard');
                        store.dispatch(setUserdata(response.val()[u]));
                    } else {
                        this.setState({
                            formError: "Incorrect Username or Password.",
                            loading: false
                        })    
                    }
                } else {
                    this.setState({
                        formError: "Some error occoured, Try Again...",
                        loading: false
                    })
                }
            }).catch((err)=> {
                this.setState({
                    formError: "Incorrect Username or Password.",
                    loading: false
                })
            })
        }
    }

    handleInput(e) {
        // console.log(e.target.name, e.target.value);
        this.setState({
            [e.target.name]: e.target.value,
            formError: ''
        });
    }

    render() {
        const { showPassword, loading, formError } = this.state;
        return (
            <div>
                <div className="col-xs-8 col-lg-8 col-md-12 col-sm-12 login-container mt-28 vertical-center">
                    <div className="bodyimg"></div>
                    <div className="row mt-4">
                        <div className="login-form-container col-xs-12 col-sm-12 col-xs-6 col-sm-6 col-md-6 col-lg-3 bg-whitecolor centered">
                            <div className="text-center mt-5 logo"></div>
                            <h2 className="loginHeader ng-binding text-center">
                                ADMIN PANEL
                            </h2>
                            <h5 className="mt-4 font-16 ng-binding subtitle text-center secondThemeColor">
                                Enter Login Crediential
                            </h5>
                            <form
                                className="form-horizontal logforms"
                                onSubmit={null}
                            >
                                <div className="form-group form-group2">
                                    <div className="col-xs-10 col-sm-10 col-md-10 signup-form-input-box">
                                        <label className="secondThemeColor">Registration ID</label>
                                        <div className="input-group mb-3">
                                            <input
                                                ref={(input) => { this.registrationID = input }} 
                                                onChange={this.handleInput.bind(
                                                    this
                                                )}
                                                type="tel"
                                                className="form-control lg-input inputplace inputplace1 bgTransparentWhite"
                                                name="registrationID"
                                                placeholder="Registration ID"
                                                required={true}
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div className="form-group form-group2">
                                    <div className="col-xs-10 col-sm-10 col-md-10 signup-form-input-box">
                                        <label className="secondThemeColor">Password</label>
                                        <div className="input-group mb-3">
                                            <input
                                                onChange={this.handleInput.bind(
                                                    this
                                                )}
                                                ref={(input) => { this.password = input }} 
                                                type={
                                                    showPassword
                                                        ? 'text'
                                                        : 'password'
                                                }
                                                className="form-control lg-input inputplace inputplace1 bgTransparentWhite"
                                                name="password"
                                                placeholder="Password"
                                                required={true}
                                                autoComplete="new-password"
                                            />
                                            <div
                                                className="input-group-prepend eyeipbox bgTransparentWhite border-left"
                                                title="Show/Hide Password"
                                                onClick={() =>
                                                    this.setState({
                                                        showPassword: !showPassword,
                                                    })
                                                }
                                                style={{ cursor: 'pointer' }}
                                            >
                                                <FontAwesomeIcon
                                                    icon={
                                                        showPassword
                                                            ? faEyeSlash
                                                            : faEye
                                                    }
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                    <div className="form-group">
                                        <div className="col-xs-10 col-sm-10 col-md-10 col-md-offset-3">
                                            <Button
                                                onClick={this.handleSubmit.bind(this)}
                                                variant="contained"
                                                type="submit"
                                                className={loading?"w-100 p-3 bg-muted text-muted  mt-5":"w-100 p-3 bg-theme2 text-muted  mt-5"}
                                                endIcon={null}
                                            >
                                                {loading ? 
                                                    <Spinner
                                                        as="span"
                                                        animation="border"
                                                        size="md"
                                                        role="status"
                                                        aria-hidden="true"
                                                    />
                                                :
                                                    <strong>LOGIN</strong>
                                                }
                                            </Button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                {
                    (formError)?
                    
                    <Snackbar 
                        anchorOrigin={{
                            vertical: 'top',
                            horizontal: 'right',
                        }} 
                        open={formError} 
                        autoHideDuration={null} 
                        // onClose={()=>{this.setState({formError:''})}}
                        TransitionComponent='SlideTransition'    
                    >
                        <Alert onClose={()=>{this.setState({formError:''})}} severity="warning">
                            <strong>{formError}</strong> 
                        </Alert>
                    </Snackbar>
                    :null
                }
            </div>
        );
    }
}


const mapStateToProps = (state, props) => {
    // const {userData } = state;
    console.log("state:",state)
    return {
    };
};
export default connect(mapStateToProps)(LoginScreen);