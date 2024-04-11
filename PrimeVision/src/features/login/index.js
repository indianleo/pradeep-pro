import { TextField, Button } from "@mui/material";
import 'bootstrap/dist/js/bootstrap.bundle';
import React from "react";
import { set } from "firebase/database";
import { getDbRef } from "../../config/fbConnect";
import { getIp } from "../../libs/utill";
import { ssd } from "../../libs/helper";
import { useNavigate } from "react-router-dom";

const Login = ()=> {
    const [num, setNum] = React.useState('');
    const [IP, setIp] = React.useState('');
    const navigate = useNavigate();

    React.useEffect(()=> {
        getSystemIP();
    }, []);

    const handleMobile = (e) => {
        const val = e.target.value;
        setNum(val);
    }

    const getSystemIP = async ()=> {
        const ipStr = await getIp();
        setIp(ipStr);
    }

    const onLogin = ()=> {
        set(getDbRef(`users/${num}`), {
            mobile: num,
            ipAddress: IP,
            proof: {}
        }).then((res)=> {
            ssd.set('user', {
                isLogin:true,
                mobile: num
            });
            navigate('Home');

        })
    }

    return (
        <div>
            <div className="pb-3 pt-3">
                <p>Enter your number to continue:</p>
                <TextField 
                    id="outlined-basic" 
                    label="Mobile" 
                    variant="outlined" 
                    style={{width: '50%'}}
                    onChange={handleMobile}
                />
            </div>
            <Button 
                variant="contained" 
                onClick={onLogin}
                style={{width: '50%'}}
            >
                Login
            </Button>
        </div>
    )
}

export default Login;