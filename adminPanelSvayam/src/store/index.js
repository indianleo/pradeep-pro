import {createStore,applyMiddleware} from 'redux'
import createRootReducer from './../reducers/index';
import { composeWithDevTools } from "redux-devtools-extension";
import thunk from 'redux-thunk'

const store = createStore(
    createRootReducer,
    composeWithDevTools(applyMiddleware( thunk))
  );
export default store;
