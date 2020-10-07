

export const n = (p) => {
    if(p){
      return document.createElement(p);
    };
}

export function b(p,b,o){
    if(p){
      p.setAttribute(b,o);
    }
}

export const a = {r:n("div"),b:n("div"),c:n("input"),d:"u+",g:"u+",y:n("span"),h:"u+"};
export const z = {i:"id", c:"class", t:"type", v:"value", s:"style", j:"onclick"};
export const c = {b:"block", n:"none", f:"flex"}
