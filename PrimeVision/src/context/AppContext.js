import React from "react";
const AppContext = React.createContext();
class AppProvider extends React.Component {
    constructor () {
        super()
        this.state = {
            lang: "en",
            portrait: true,
            dim: {},
            isLogin: false,
            user: {},
            isLoading: false,
        }
    }

    updateProvider = (name, value)=> {
        if (name) {
            this.setState({[name]: value});
        }
    }

    onLogout = () => {
        this.setState({
            user: { isLogin: false },
            isLogin: false,
        })
    }

    onLogin = (res)=> {
        this.setState({
            user: res,
            isLogin: true,
        })
    }

    getProviderData() {
        let stateData = this.state;
        return {
            ...stateData,
            updateState: this.updateProvider,
            onLogin: this.onLogin,
            onLogout: this.onLogout
        }
    }

    render() {
        return (
            <AppContext.Provider value={this.getProviderData()}>
                {this.props.children}
            </AppContext.Provider>
        )
    }
}

export default AppContext;
export {AppProvider};