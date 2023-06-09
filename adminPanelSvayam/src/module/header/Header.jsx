import React, { Component } from 'react';
import Breadcrumbs from '@material-ui/core/Breadcrumbs';
import Typography from '@material-ui/core/Typography';
import Link from '@material-ui/core/Link';
import AppBar from '@material-ui/core/AppBar';

export default class Header extends Component {
    constructor(props) {
        super(props);
        this.state = {};
    }
    componentDidMount() {}

    render() {
        return (
            <React.Fragment>
                <AppBar position="static" className="bg-theme">
                    <div className="p-2 m-3">
                        <Breadcrumbs aria-label="breadcrumb" className=" text-dark">
                            <Link color="inherit" href="/" onClick={null}>
                                Home
                            </Link>
                            <Typography>
                                Dashboard
                            </Typography>
                        </Breadcrumbs>
                    </div>
                </AppBar>
            </React.Fragment>
        );
    }
}
