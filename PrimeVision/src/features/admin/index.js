import React from "react";
import { db, getDbRef } from "../../config/fbConnect";
import { onValue } from "firebase/database";
import { ssd } from "../../libs/helper";

const Admin = (props) => {
    const [list, setList] = React.useState({});
    const [selected, setSelected] = React.useState('');
    const user = ssd.get('user');

    React.useEffect(()=> {
        const usersRef = getDbRef('users/');
        onValue(usersRef, (snapshot) => {
            const data = snapshot.val();
            setList(data);
        });
    }, []);

    const selectUser = (id)=> {
        return ()=> {
            setSelected(id);
        }
    }

    const loadUser = ()=> {
        const d = Object.keys(list)?.map((item)=> {
            return (
                <div key={item}>
                    <button onClick={selectUser(item)} >{item}</button>
                </div>
            )
        })
        return d;
    }

    const loadImg = ()=> {
        const d = list[selected]?.proof?.map((item, index)=> {
            return(
                <div key={index} style={{padding: '10px', border: '1px solid green'}}>
                    <div>
                        <span style={{padding: '5px'}}>IP: {item.coords}</span>
                    </div>
                    <img src={item.imgUrl} />
                </div>
            )
        })
        return d;
    }

    return (
        <div>
            <div style={{display: 'flex', flexDirection: 'row', padding: '10px'}}>{loadUser()}</div>
            <div>
                {loadImg()}
            </div>
        </div>
    )
}

export default Admin;