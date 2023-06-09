import React, { Component } from 'react'
import {Link } from 'react-router-dom';
import './style.css';

export default class ErrorPage extends Component {
    constructor(props){
        super(props)
        this.state={}
    }

    componentDidMount(){
        const el = document.querySelector("#errorImages");
        const el2 = document.querySelector("#errorImages2");
        
        document.addEventListener('mousemove', (e) => {
            el.style.setProperty('--x', -e.pageX/50 + "px");
            el.style.setProperty('--y', -e.pageY/40+ "px");

            el2.style.setProperty('--x', (-e.pageX / 50) + "px");
            el2.style.setProperty('--y', (-e.pageY / 10)+ "px");
        });
    }

    render() {
        return (
            <div className="text-center">
                    <div className="errorImage" id="errorImages"> </div>
                    <div className="errorImage2" id="errorImages2"> </div>
                    <div className="center ">
                        <div className=" shadow-lg p-5 mt-5 bg-secondary">
                            <strong className="display-1 text-white font-weight-bold mb-4">404 Page Not Found</strong>
                            <br/><br/>
                            <span className="p-4 m-4"><Link to="/" className="text-white display-6 m-4 p-4 text-decoration-none">Click to Redirect you Login Page</Link></span>
                            <br/>
                            <div className="w-100 m-4 text-warning">Error indicates that the server itself was found, but you don't have access for requested Page.<br/>
                                or it appear when the given URL refers to a server name that does not exist.<br/>
                            </div>
                        </div>
                    </div>
            </div>
        )
    }
}
