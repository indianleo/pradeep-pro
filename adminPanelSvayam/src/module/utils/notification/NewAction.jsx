import React, { Component } from 'react'
import { Alert, AlertTitle } from '@material-ui/lab';
import IconButton from '@material-ui/core/IconButton';
import CloseIcon from '@material-ui/icons/Close';
import CheckIcon from '@material-ui/icons/Check';

export default class NewAction extends Component {
    render() {
        return (
            <div className="m-5">
                <Alert severity="error"
                    action={
                        <IconButton
                        aria-label="close"
                        color="inherit"
                        size="small"
                        onClick={null}
                        >
                        <CloseIcon fontSize="inherit" />
                        </IconButton>
                    }
                    >
                    <AlertTitle>Error</AlertTitle>
                    You have one pending task, which need to fix immediately...
                    This is an error alert — <strong>check it out!</strong>
                </Alert>
                <br/>
                <Alert icon={<CheckIcon fontSize="inherit" />} severity="success"
                action={
                    <IconButton
                    aria-label="close"
                    color="inherit"
                    size="small"
                    onClick={null}
                    >
                    <CloseIcon fontSize="inherit" />
                    </IconButton>
                }
                >
                    This is a success alert — check it out!
                </Alert>
            </div>
        )
    }
}
