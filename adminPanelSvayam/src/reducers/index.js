import {combineReducers} from "redux";
import userData from './Auth/reducer'

const createRootReducer = combineReducers({
    userData,
}) 
export default createRootReducer;
